$( document ).ready(function() {

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
    $(document).on('click', '.weight-add .addweight', function(){
        var html = '<div class="d-flex mt-2"><input type="text" name="weight-option-value[]" class="input-weight-option form-control col-5" value=""><input type="number" name="weight-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="weight-option-quantity form-control col-2 ml-2" value=""><input type="number" name="weight-option-price[]" data-toggle="tooltip" title="Giá" class="weight-option-price form-control col-3 ml-2" value=""><button type="button" class="delcate col-1 btn btn-primary ml-2">-</button></div>';
        $(this).parent().parent().append(html);
    });
    $(document).on('click', '.weight-add .delcate', function(){
        $(this).parent().remove();
    });

    $(document).on('click', '.size-add .addsize', function(){
        var html = '<div class="d-flex mt-2"><input type="text" name="size-option-value[]" class="input-size-option form-control col-5" value=""><input type="number" name="size-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="size-option-quantity form-control col-2 ml-2" value=""><input type="number" name="size-option-price[]" data-toggle="tooltip" title="Giá" class="size-option-picee form-control col-3 ml-2" value=""><button type="button" class="delcate col-1 btn btn-primary ml-2">-</button></div>';
        $(this).parent().parent().append(html);
    });
    $(document).on('click', '.size-add .delcate', function(){
        $(this).parent().remove();
    });

    $(document).on('click', '.color-add .addcolor', function(){
        var html = '<div class="d-flex mt-2"><input type="text" name="color-option-value[]" class="input-color-option form-control col-4" value=""><input type="color" name="color-option-code[]" data-toggle="tooltip" title="Mã màu" value="" class="col-1 ml-2 form-control p-1"><input type="number" name="color-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="color-option-quantity form-control col-2 ml-2" value=""><input type="number" name="color-option-price[]" data-toggle="tooltip" title="Giá" class="color-option-price form-control col-3 ml-2" value=""><button type="button" class="delcate col-1 btn btn-primary ml-2">-</button></div>';
        $(this).parent().parent().append(html);
    });
    $(document).on('click', '.color-add .delcate', function(){
        $(this).parent().remove();
    });

    $(document).on('click', '.weight-mod .addweight', function(){
        var html = '<div class="d-flex mt-2"><input type="text" name="weight-option-value[]" class="input-weight-option form-control col-4" value=""><input type="number" name="weight-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="weight-option-quantity form-control col-1 ml-2" value=""><input type="number" name="weight-option-price[]" data-toggle="tooltip" title="Giá" class="weight-option-price form-control col-2 ml-2" value=""><button type="button" class="addweight col-1 btn btn-primary ml-2">+</button><button type="button" class="delweight col-1 btn btn-primary ml-2">-</button></div>';
        $(this).parent().parent().append(html);
    });
    $(document).on('click', '.weight-mod .delweight', function(){
        var num = $('.weight-mod .delweight').length;
        if (num > 1) {
            $(this).parent().remove();
        }
    });

    $(document).on('click', '.size-mod .addsize', function(){
        var html = '<div class="d-flex mt-2"><input type="text" name="size-option-value[]" class="input-size-option form-control col-4" value=""><input type="number" name="size-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="size-option-quantity form-control col-1 ml-2" value=""><input type="number" name="size-option-price[]" data-toggle="tooltip" title="Giá" class="size-option-price form-control col-2 ml-2" value=""><button type="button" class="addsize col-1 btn btn-primary ml-2">+</button><button type="button" class="delsize col-1 btn btn-primary ml-2">-</button></div>';
        $(this).parent().parent().append(html);
    });
    $(document).on('click', '.size-mod .delsize', function(){
        var num = $('.size-mod .delsize').length;
        if (num > 1) {
            $(this).parent().remove();
        }
    });

    $(document).on('click', '.color-mod .addcolor', function(){
        var html = '<div class="d-flex mt-2"><input type="text" name="color-option-value[]" class="input-color-option form-control col-4" value=""><input type="color" name="color-option-code[]" value="" data-toggle="tooltip" title="Mã màu" class="col-1 ml-2 form-control p-1"><input type="number" name="color-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="color-option-quantity form-control col-1 ml-2" value=""><input type="number" name="color-option-price[]" data-toggle="tooltip" title="Giá" class="color-option-price form-control col-2 ml-2" value=""><button type="button" class="addcolor col-1 btn btn-primary ml-2">+</button><button type="button" class="delcolor col-1 btn btn-primary ml-2">-</button></div>';
        $(this).parent().parent().append(html);
    });
    $(document).on('click', '.color-mod .delcolor', function(){
        var num = $('.color-mod .delcolor').length;
        if (num > 1) {
            $(this).parent().remove();
        }
    });
    
    $('.select-option').change(function() {
        var option = $(this).children("option:selected").val();
        if (option == 'weight') {
            $('.weight-add').show();
        }
        else {
            $('.weight-add').hide();
        }
        if (option == 'size') {
            $('.size-add').show();
        }
        else {
            $('.size-add').hide();
        }
        if (option == 'color') {
            $('.color-add').show();
        }
        else {
            $('.color-add').hide();
        }
        if (option == 'none') {
            $('.no-add').show();
        }
        else {
            $('.no-add').hide();
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(':input[type="number"]').on('keypress',function(evt) {
        if(evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
            evt.preventDefault();
        }
    });

    $('.delpd-btn').click(function() {
        return confirm('Bạn có chắc chắn xóa sản phẩm này không ?');
    });
    
});