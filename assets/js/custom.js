document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btnNext').forEach(function(btnNext) {
        btnNext.addEventListener('click', function() {
            const nextTabLinkEl = document.querySelector('.nav .active').closest('li').nextElementSibling.querySelector('a');
            const nextTab = new bootstrap.Tab(nextTabLinkEl);
            nextTab.show();
        });
    });

    document.querySelectorAll('.btnPrevious').forEach(function(btnPrevious) {
        btnPrevious.addEventListener('click', function() {
            const prevTabLinkEl = document.querySelector('.nav .active').closest('li').previousElementSibling.querySelector('a');
            const prevTab = new bootstrap.Tab(prevTabLinkEl);
            prevTab.show();
        });
    });
});
