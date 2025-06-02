<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $(".cnic").inputmask({"mask": "99999-9999999-9"});

        $(document).on('change', '.homeOwnerShip', function () {
            let val = $(this).find(':selected').val();
            if(val == 'rental') {
                $('input[name="rent"]').css("display", "block").prop('required',true);
            }else {
                $('input[name="rent"]').css("display", "none").prop('required',false);
            }
        });
    });
</script>
