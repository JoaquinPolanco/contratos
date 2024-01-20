$(document).ready(function () {
    loadPagination(); 

    function loadPagination(page = 1) {
        $.ajax({
            url: '{{ $contratos->url(1) }}', 
            type: 'GET',
            data: { page: page }, 
            success: function (data) {
                $('#pagination-container').html($(data).find('#pagination-container').html());
            }
        });
    }

    $(document).on('click', '#pagination-container a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var page = url.split('page=')[1];
        loadPagination(page);
    });
});