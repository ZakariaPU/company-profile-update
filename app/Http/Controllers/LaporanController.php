<?php

namespace App\Http\Controllers;

use App\Models\CateringOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = CateringOrder::query();

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhere('menu_type', 'like', "%{$search}%");
            });
        }

        // Apply date range filter
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', Carbon::parse($request->start_date));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', Carbon::parse($request->end_date));
        }

        // Apply status filter
        if ($request->filled('status') && in_array($request->status, ['pending', 'processing', 'completed', 'cancelled'])) {
            $query->where('status', $request->status);
        }

        // Get paginated orders with status classes
        $orders = $query->latest()
            ->paginate(10)
            ->through(function ($order) {
                $order->status_class = $this->getStatusClass($order->status);
                return $order;
            });

        // Handle PDF export
        if ($request->has('print')) {
            return $this->generatePDF($orders);
        }

        return view('laporan', compact('orders'));
    }

    public function show($id)
    {
        try {
            $order = CateringOrder::findOrFail($id);
            $order->status_class = $this->getStatusClass($order->status);
            
            return response()->json([
                'success' => true,
                'id' => $order->id,
                'name' => $order->name,
                'email' => $order->email,
                'phone' => $order->phone,
                'address' => $order->address,
                'menu_type' => $order->menu_type,
                'quantity' => $order->quantity,
                'notes' => $order->notes,
                'status' => $order->status,
                'created_at' => $order->created_at,
                'status_class' => $order->status_class,
                'instagram' => $order->instagram,
                'meal_types' => $order->meal_types,
                'start_date' => $order->start_date,
                'end_date' => $order->end_date,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,processing,completed,cancelled'
            ]);

            $order = CateringOrder::findOrFail($id);
            $order->status = $request->status;
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Status pesanan berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status pesanan'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = CateringOrder::findOrFail($id);
            $order->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus pesanan'
            ], 500);
        }
    }

    private function generatePDF($orders)
    {
        $data = [
            'orders' => $orders,
            'generated_at' => Carbon::now()->format('d M Y H:i:s'),
            'total_orders' => $orders->total()
        ];

        $pdf = PDF::loadView('pdf.laporan', $data);
        return $pdf->download('laporan-pesanan-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }

    private function getStatusClass($status)
    {
        return match ($status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'processing' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}