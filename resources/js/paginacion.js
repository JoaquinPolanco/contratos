$(document).ready(function () {
    loadPagination(); // Cargar paginación al cargar la página

    function loadPagination(page = 1) {
        $.ajax({
            url: '{{ $contratos->url(1) }}', // URL de la primera página
            type: 'GET',
            data: { page: page }, // Página actual
            success: function (data) {
                $('#pagination-container').html($(data).find('#pagination-container').html());
            }
        });
    }

    // Manejador de clics en los enlaces de paginación
    $(document).on('click', '#pagination-container a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var page = url.split('page=')[1];
        loadPagination(page);
    });
});