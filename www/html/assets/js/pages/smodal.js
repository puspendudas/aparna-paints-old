function callModal(event){
    if(event=='party')
    {
        $('#'+event).modal("show");
    }
    else if(event == 'addCustomerDetailsModal'){
        $('#add_customer')[0].reset();
        $('.customer_mobile_number').prop('disabled', false);
        $('#insert_customer').val("SAVE");
        $('#'+event).modal("show");
    }
    else if(event == 'addPartyDetailsModal'){
        $('#add_party')[0].reset();
        $('.party_phone_number').prop('disabled', false);
        $('#insert_party').val("SAVE");
        $('#'+event).modal("show");
    }
    else if(event == 'addItemModal'){
        $('#add_item')[0].reset();
        document.getElementById('show_units_and_conversion_rate').innerHTML = '';
        $('select[name=category_id]').val("");
        $('.selectpicker').selectpicker('refresh');
        $('#insert_item').val("SAVE");
        $('#'+event).modal("show");
    }else if(event == 'partyPayment'){
        $('#party_payment')[0].reset();
        $('#'+event).modal("show");
    }
    else if(event == 'adjustItemModal'){
        $('#'+event).modal("show");
    }else if(event == 'unit'){
        $('#'+event).modal("show");
    }else if(event == 'addCategory')
    {
        $('#add_category')[0].reset();
        $('#insert_category').val("SAVE");
        $('#'+event).modal("show");
    }
    else if(event == 'editCategory'){
        $('#'+event).modal("show");
    }else if(event == 'addUnitModal'){
        $('#add_unit')[0].reset();
        $('#insert_unit').val("SAVE");
        $('#'+event).modal("show");
    }
    else if(event == 'editUnit'){
        $('#'+event).modal("show");
    }else if(event == 'editItemUnit'){
        $('#'+event).modal("show");
    }else if(event == 'expense'){
        $('#'+event).modal("show");
    }
}
