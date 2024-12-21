<script>
    $(document).ready(function () {
        // Function to handle form submission and pagination
        function fetchData(url, formData) {
            $.ajax({
                type: 'GET',
                url: url,
                data: formData,
                success: function (data) {
                    console.log('Received Data:', data);
                    var filteredStudentsHtml = data.html;
                    var tempContainer = $('<div>').html(filteredStudentsHtml);
                    var resultContainer = tempContainer.find('#results-container');
                    $('#results-container').empty();
                    $('#results-container').append(resultContainer.html());
                    $('html, body').animate({
                            scrollTop: $('#results-container').offset().top
                        }, 1000);
                    $('#results-container .wow').attr('data-wow-delay', '0s');
                    new WOW().init();
                },
                error: function (error) {
                    console.log('Error:', error);
                    if (error.responseText) {
                        console.log('Error Response:', error.responseText);
                    }
                }
            });
        }

        // Submit form on filter change
        $('#filter-form').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            fetchData(window.location.href, formData);
        });

        // Handle pagination clicks
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var pageUrl = $(this).attr('href');
            fetchData(pageUrl, $('#filter-form').serialize());
        });
    });
</script>