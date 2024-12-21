<script>
        // Function to handle notification clicks
        function scrollToSection(sectionId) {
            var targetSection = document.getElementById(sectionId);

            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Function to toggle notification visibility
        function toggleNotification() {
            var notification = document.getElementById('sectionNotification');
            notification.classList.toggle('show');
        }
    
    function navigateToPage(pageUrl) {
    window.location.href = pageUrl;
}


        document.addEventListener('DOMContentLoaded', function () {
            var toggleNotificationArrow = document.getElementById('toggleNotificationArrow');
            toggleNotificationArrow.style.display = 'block';
        });
    </script>