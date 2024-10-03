@if (Session::has('success'))
<script>
    Toastify({
    text: "{{ Session::get('success') }}",
    duration: 3000,
    destination: "https://github.com/apvarun/toastify-js",
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "left", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
        background: "linear-gradient(to right, #fff, #fff)",
        color: "#000",
    },
    onClick: function(){} // Callback after click
    }).showToast();
</script>
@endif