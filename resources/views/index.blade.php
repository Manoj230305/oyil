@include('headers.top') 
@include('headers.header')


 @include('home') 

@include('about')

@include('gallery')

@include('services')

@include('testimonals')

@include('image_car')

@include('contact')

@include('branch')

@include('footers.footer')
@include('loader')
<script>
    // Check for success message in the session and show SweetAlert
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}'
        });
    @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}'
        });
    @endif
</script>

@include('footers.dependency')
