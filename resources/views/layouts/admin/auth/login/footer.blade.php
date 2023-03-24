<footer class="main-footer text-center">
    <p class="font-xs">
        <script>
            document.write(new Date().getFullYear());
        </script>
        &copy; Nest - HTML Ecommerce Template .
    </p>
    <p class="font-xs mb-30">All rights reserved</p>
</footer>
</main>
<script src="{{asset('backend/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('backend/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
<!-- Main Script -->
<script src="{{asset('backend/assets/js/main.js?v=1.1" type="text/javascript')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

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


</script>
</body>
</html>
