

<script src="{{asset('Admin/js/script.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
         function deleteForm(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if(result.isConfirmed) {
                        document.getElementById('delete').submit();
                    }
                })
            }

</script>
        @if(session()->has('success'))
            <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "{{session()->get('success')}}",
                        showConfirmButton: false,
                        timer: 2500
                    })
            </script>
        @endif
</body>
</html>
