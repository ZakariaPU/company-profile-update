
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('orderForm');
    const modal = document.getElementById('confirmationModal');
    let map, marker;

    // Initialize map
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: { lat: -6.2088, lng: 106.8456 } // Default to Jakarta
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });

        // Update address field when marker is dragged
        marker.addListener('dragend', function() {
            const position = marker.getPosition();
            updateAddressFromLatLng(position.lat(), position.lng());
        });
    }

    // Get user's location
    window.getLocation = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    marker.setPosition(pos);
                    updateAddressFromLatLng(pos.lat, pos.lng);
                },
                () => {
                    alert('Error: The Geolocation service failed.');
                }
            );
        } else {
            alert('Error: Your browser doesn\'t support geolocation.');
        }
    };

    // Update address field using reverse geocoding
    function updateAddressFromLatLng(lat, lng) {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: { lat, lng } }, (results, status) => {
            if (status === 'OK') {
                if (results[0]) {
                    document.getElementById('address').value = results[0].formatted_address;
                }
            }
        });
    }

    // Form submission handling
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        modal.classList.remove('hidden');
    });

    // Confirm order
    window.confirmOrder = function() {
        form.submit();
    };

    // Cancel order
    window.cancelOrder = function() {
        modal.classList.add('hidden');
    };

    // Initialize map
    initMap();
});