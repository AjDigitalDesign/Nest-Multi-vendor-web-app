
<script src="{{asset('backend/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/chart.js')}}"></script>
    <!-- Main Script -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="{{asset('backend/assets/js/main.js?v=1.1')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/custom-chart.js')}}" type="text/javascript"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif


    $('.show_confirm').click(function(event) {
        const form =  $(this).closest("form");
        const name = $(this).data("name");

        // const url = $(this).parent().attr('href')
        event.preventDefault();

        Swal.fire({
            position: 'top-end',
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });

    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>

</body>
</html>
