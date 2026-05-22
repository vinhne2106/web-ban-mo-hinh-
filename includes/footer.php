<footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Mechashop 2026. Đồ án Web nâng cao.</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script>
document.querySelectorAll('.reload-page').forEach(link => {

    link.addEventListener('click', function(e) {
        e.preventDefault();

        const loader = document.getElementById('page-loader');

        loader.classList.add('active');

        setTimeout(() => {
            window.location.href = this.href;
        }, 500);
    });

});
</script>
    </body>
</html>