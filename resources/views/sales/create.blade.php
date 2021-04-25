@extends('layouts.backend')

@section('title', 'Add Sales')

@section('content_header', 'Add Sales')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('sales.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('/sales')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="served_by">Served By <sup class="text-danger">*</sup></label>
                                        <input type="text" name="served_by" value="{{ old('served_by') }}"
                                               placeholder="Enter Name" class="form-control" id="served_by" required>
                                        @error('served_by')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="billed_by">Billed By <sup class="text-danger">*</sup></label>
                                        <input type="text" name="billed_by" value="{{ old('billed_by') }}"
                                               placeholder="Enter Name" class="form-control" id="billed_by" required>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h5
                class="processing_element alert alert-info"
                style="
                  display: none;
                  margin: 0 0 5px 0;
                  padding-top: 10px;
                  padding-bottom: 10px;
                "
              >
                Processing... <i class="fa fa-spin fa-refresh"></i>
              </h5>
                            <div class="row">
                                <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="id_materials">Search Product </label>
                                        <input type="text" placeholder="Enter Material Name or Code" id="id_materials" class="form-control" autocomplete="off">
                                        <div id="materialResultList"></div>
                                        <span id="material_errors" class="required_msg"></span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                <table class="table table-bordered">
              <thead class="material_box_heading">
                <tr>
                  <th style="width: 30%" class="text-center">
                    Product
                  </th>
                  <th style="width: 8%" class="text-center">Qty.</th>
                  <th style="width: 8%" class="text-center">Rate Per Product</th>
                  <th style="width: 8%" class="text-center">Total</th>
                </tr>
              </thead>
              <tbody class="material_box_body" id="material_box_body"></tbody>
              <tfoot>
                <tr>
                  <th colspan="3" class="m_foot text-right">Total</th>
                  <th>
                    <input
                      type="text"
                      name="sub_total"
                      class="sub_total disabled_input text-right"
                      readonly
                    />
                  </th>
                </tr>
                <tr>
                  <th colspan="3" class="m_foot text-right">Vat(%)</th>
                  <th>
                  <input type="number" name="vat_total"
                                               class="vat_total text-right"
                                               placeholder="Enter VAT Amount" min="0" step="any">
                  </th>
                </tr>
                <tr>
                  <th colspan="3" class="m_foot text-right">Discount(%)</th>
                  <th>
                  <input type="number" name="discount"
                                               class="discount text-right"
                                               placeholder="Enter Discountt" min="0" step="any">
                  </th>
                </tr>
                <tr>
                  <th colspan="3" class="m_foot text-right">Service Charge</th>
                  <th>
                    <input type="number" name="sd_amount_total"
                                               class="sd_amount_total text-right"
                                               placeholder="Enter Service Charge" min="0" step="any">
                  </th>
                </tr>
                <tr>
                  <th colspan="3" class="m_foot text-right">Amount Total</th>
                  <th>
                    <input
                      type="text"
                      name="amount_total"
                      class="amount_total disabled_input text-right"
                      readonly
                    />
                    <input
                      type="hidden"
                      name="t_vat"
                      class="t_vat disabled_input text-right"
                      readonly
                    />
                    <input
                      type="hidden"
                      name="t_discount"
                      class="t_discount disabled_input text-right"
                      readonly
                    />
                  </th>
                </tr>
              </tfoot>
            </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-sm btn-success"> Submit
                                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
$(document).on('keyup', '#id_materials', function (e) {
            e.preventDefault();

            let targetElement = $('#materialResultList');
            let keyword = $.trim($(this).val());
            
            let url = '{{ url('/search/byProductName') }}';
            if (keyword !== "") {
                targetElement.html('<span class="text-info"><i class="fa fa-spinner"></i> Processing...</span>');
                $.ajax({
          url: url,
          type: "post",
          headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
          data: {
            keyword: keyword,
          },
          dataType: "html",
          success: function (data) {
            targetElement.fadeIn();
            targetElement.html(data);
          },
          error: function (error) {
            console.log(error);
          },
                });
            }
             else {
                targetElement.fadeOut()
            }
        });

       // Sales ORDER SECTION
 $(document).on('click', 'li.material', function (e) {
        e.preventDefault();

        let materialResultList = $('#materialResultList');
        let search_field = $('#id_materials');
        let material_id = $(this).data('product_id');
        var breakLoop = false;

        $('.material_ids').each(function () {
            if (parseInt(material_id) === parseInt($(this).val())) {
                breakLoop = true;
            }
        });

        if (breakLoop) {
            alert('You already added this Material. try another one.');
            search_field.val('');
            materialResultList.fadeOut();
            return false;
        }

        let material_name = $(this).data('product_name');
        let material_code = $(this).data('product_id');
        let product_price = $(this).data('product_price');
        let product_category_id = $(this).data('product_category_id');
        let product_category = $(this).data('product_category');

        let content = '<tr>';
        content += '<input type="hidden" name="type_id_' + material_id + '" value="' + product_category_id + '" >';
        content += '<input type="hidden" name="product_id_' + material_id + '" value="' + material_code + '" >';
        content += '<input type="hidden" name="material_ids[]" value="' + material_id + '" class="material_ids">';

        content += '<td width="20%">';
        content += '<input type="hidden" name="price_' + material_id + '" class="price price_' + material_id + '" autocomplete="off" mid="' + material_id + '" min="0">';
        content += '<button type="button" class="remove_material btn btn-danger btn-mini" style="padding: 0px 5px">x</button> ' +  material_name + ' (' + product_category + ')';
        content += '</td>';

        content += '<td>';
        content += '<input type="number" name="quantity_' + material_id + '" class="quantity text-right quantity_' + material_id + '" autocomplete="off" placeholder="Enter quantity" min="1" required mid="' + material_id + '">';
        content += '</td>';

        content += '<td>';
        content += '<input readonly value="'+product_price+'" type="number" name="rate_' + material_id + '" class="rate text-right rate_' + material_id + '" autocomplete="off"  placeholder="Enter Per Product Price" min="0.01" required mid="' + material_id + '" step="any">';

        content += '<td class="per_item_total_' + material_id + ' text-center"  style="font-weight: bold;border-color: #c3c3c3;x 6px; ">';
        content += 0;
        content += '</td>';
        content += '</tr>';

        $('#material_box_body').append(content);
        search_field.val('');

        materialResultList.fadeOut();
        get_total_bill_calculation();
    });

    $(document).on('click', '.remove_material', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        get_total_bill_calculation();
    });

function get_total_bill_calculation() {
  let sub_total = 0;
  let vat_total = 0;
  let sd_amount_total = 0;
  let amount_total = 0;
  let discount = 0;

  $("#material_box_body tr td .price").each(function () {
        if($(this).val()){
          sub_total += parseFloat($(this).val())
        }if($(this).val() === ""){
          sub_total += 0;
        }
    });

    $('.sub_total').val(sub_total.toFixed(2));

    if($('.vat_total').val()){
      vat_total = parseFloat($('.vat_total').val());
    }
    if($('.vat_total').val() === ""){
      vat_total = 0;
    }

    if($('.sd_amount_total').val()){
      sd_amount_total = parseFloat($('.sd_amount_total').val());
    }
    if($('.sd_amount_total').val() === ""){
      sd_amount_total = 0;
    }

    if($('.discount').val()){
      discount = parseFloat($('.discount').val());
    }
    if($('.discount').val() === ""){
      discount = 0;
    }

    let total_vat = parseFloat((vat_total/100) * sub_total );
    let total_discount = parseFloat((discount/100) * (total_vat + sub_total) );

    $('.t_vat').val(total_vat);
    $('.t_discount').val(total_discount);
    console.log(total_vat + " " + total_discount);
    amount_total = sub_total + total_vat -  total_discount;
    amount_total = amount_total + sd_amount_total;

    $('.amount_total').val(amount_total);
}

$(document).on('change', '.quantity', function (e) {
        e.preventDefault();
        let id = $(this).attr('mid');
        get_single_total(id);
        get_total_bill_calculation();
    });

$(document).on('keyup', '.quantity', function (e) {
    e.preventDefault();
    $('.quantity').trigger("change");
});
$(document).on('change', '.rate', function (e) {
        e.preventDefault();
        let id = $(this).attr('mid');
        get_single_total(id);
        get_total_bill_calculation();
    });

$(document).on('keyup', '.rate', function (e) {
    e.preventDefault();
    $('.rate').trigger("change");
});
$(document).on('change', '.discount', function (e) {
  e.preventDefault();
            get_total_bill_calculation();
    });

$(document).on('keyup', '.discount', function (e) {
            e.preventDefault();
            get_total_bill_calculation();
});

// VAT Total
$(document).on('change', '.vat_total', function (e) {
            e.preventDefault();
            get_total_bill_calculation();
});

$(document).on('keyup', '.vat_total', function (e) {
            e.preventDefault();
            get_total_bill_calculation();
});

//  SD amount total
$(document).on('change', '.sd_amount_total', function (e) {
            e.preventDefault();
            get_total_bill_calculation();
});

$(document).on('keyup', '.sd_amount_total', function (e) {
            e.preventDefault();
            get_total_bill_calculation();
});

function get_single_total(id) {
//============Quantity==================
let quantity;
if($('.quantity_' + id).val()){
  quantity = parseFloat($('.quantity_' + id).val());
}
if($('.quantity_' + id).val() === ""){
  quantity = 0;
}
// console.log(quantity);
//============Rate==================
let rate;
if($('.rate_' + id).val()){
  rate = parseFloat($('.rate_' + id).val());
}
if($('.rate_' + id).val() === ""){
  rate = 0;
}
// console.log(rate);
//============Calculation==================
let per_item_total_amount = quantity * rate;
let per_item_total = per_item_total_amount;
let price = per_item_total;
$('.price_' + id).val(price.toFixed(2));
$('.per_item_total_' + id).text(per_item_total.toFixed(2));
}
</script>
@endsection