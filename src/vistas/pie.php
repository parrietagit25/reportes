
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#supertabla').DataTable();

            $("#summernote").summernote({
                height: 300, // Establece la altura del editor en píxeles
            });
        }); 
    </script>
    <script>
        tinymce.init({
            selector: '#mi-campo-de-texto'
        });

        function id_modal_edit_rec(id_edit){
            var id = id_edit;
            fetch('vistas/modal/modalUsuario.php?id=' + id)
                .then(function(response) {
                return response.text();
                })
                .then(function(data) {
                    $('#editar_contenido').modal('show');
                document.querySelector('#contenido_modal').innerHTML = data;
                })
                .catch(function(error) {
                console.log('Error al obtener los detalles:', error);
                });
        }

        function id_model_eli_rec(id_eliminar){
            var id = id_eliminar;
            fetch('vistas/modal/modalUsuario.php?eliminar_usuario=1&id=' + id)
                .then(function(response) {
                return response.text();
                })
                .then(function(data) {
                    $('#eliminar_contenido').modal('show');
                document.querySelector('#contenido_modal_eliminar').innerHTML = data;
                })
                .catch(function(error) {
                console.log('Error al obtener los detalles:', error);
                });
        }

        function id_modal_ver_rec(id_reporte){ 
            var id = id_reporte;
            fetch('vistas/modal/modalReporte.php?ver_reporte=1&id=' + id)
                .then(function(response) {
                return response.text();
                })
                .then(function(data) {
                    $('#ver_contenido_reporte').modal('show');
                document.querySelector('#contenido_modal_reporte').innerHTML = data;
                })
                .catch(function(error) {
                console.log('Error al obtener los detalles:', error);
                });
        }

        function id_model_eli_rep(id_eliminar){
            var id = id_eliminar;
            fetch('vistas/modal/modalReporte.php?eliminar_reporte=1&id=' + id)
                .then(function(response) {
                return response.text();
                })
                .then(function(data) {
                    $('#eliminar_reporte').modal('show');
                document.querySelector('#reporte_modal_eliminar').innerHTML = data;
                })
                .catch(function(error) {
                console.log('Error al obtener los detalles:', error);
                });
        }
    </script>
</body>
</html>