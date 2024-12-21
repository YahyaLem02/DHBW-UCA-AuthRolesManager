<script>
        $(document).ready(function() {
            // Listen for click events on pagination links
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                // Get the href attribute of the clicked link
                var pageUrl = $(this).attr('href');

                // Make an AJAX request to get the next page content
                $.ajax({
                    url: pageUrl,
                    type: 'get',
                    dataType: 'html',
                    success: function(response) {
                        // Create a temporary container to hold the new content
                        var tempContainer = $('<div>').html(response);

                        // Extract the content of the news container from the response
                        var newContent = tempContainer.find('#results-container').html();

                        // Add a smooth fade-out animation to the news container
                        $('#results-container').fadeOut(300, function() {
                            // Replace the entire content of the news container with the new page content
                            $(this).html(newContent);

                            // Add a smooth fade-in animation to the news container
                            $(this).fadeIn(300);
                        });
                        $('html, body').animate({
                            scrollTop: $('#results-container').offset().top
                        }, 1000);
                    }
                });
            });
        });
    </script>