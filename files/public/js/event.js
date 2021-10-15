function addManager() {
    var name = $('#manager_name').val();
    var email = $('#manager_email').val();
    var contact = $('#manager_contact').val();
    var gender = $("input[name='manager_gender']:checked").val();

    if(name == ''){
        toastr["error"]("Enter name properly");
        return;
    }

    if(!gender){
        toastr["error"]("Select a gender");
        return;
    }

    if(email == ''){
        toastr["error"]("Enter email properly");
        return;
    }

    if(contact == '' || !/^[0-9 ]+$/.test(contact)){
        toastr["error"]("Enter contact number properly");
        return;
    }

    $.ajax({
        type: "POST",
        url: addManagerUrl,
        data: {name:name,email:email,contact:contact,gender:gender,_token: token},
        success: function (data) {
            $('#man').modal('hide');
            $('#managers').append('<option value="'+data.id+'">'+name+'</option>');
            toastr["success"]("Manager added successfully");
        }
    });
}

function foodCategory() {
    var name = $('#menu_category').val();
    var description = $('#menu_description').val();
    var status = $('#category_status').val();

    if(name == ''){
        toastr["error"]("Enter category name");
        return;
    }

    $.ajax({
        type: "POST",
        url: foodCategoryUrl,
        data: {name:name,description:description,status:status,_token: token},
        success: function (data) {
            $('#cat').modal('hide');
            $('#food_category').append('<option value="'+data.id+'">'+name+'</option>');
            toastr["success"]("Food category added successfully");
        }
    });
}

function menuChoice() {
    var menu_type = $('#menu_type').val();
    var name = $('#food_name').val();
    var description = $('#food_description').val();
    var status = $('#food_status').val();
    var price = $('#menu_item_price').val();

    if(menu_type == '' || menu_type == 0){
        toastr["error"]("Select a food category");
        return;
    }

    if(name == ''){
        toastr["error"]("Enter food name");
        return;
    }

    $.ajax({
        type: "POST",
        url: menuChoiceUrl,
        data: {name:name,description:description,status:status,price:price,menu_type:menu_type,_token: token},
        success: function (data) {
            $('#menu_choice_modal').modal('hide');
            $('#menu_choice').append('<option value="'+data.id+'">'+name+'</option>');
            toastr["success"]("Menu added successfully");
        }
    });
}


function addStaff() {
    var name = $('#staff_name').val();
    var email = $('#staff_email').val();
    var contact = $('#staff_contact').val();

    if(name == ''){
        toastr["error"]("Enter name properly");
        return;
    }

    if(email == ''){
        toastr["error"]("Enter email properly");
        return;
    }

    if(contact == '' || !/^[0-9 ]+$/.test(contact)){
        toastr["error"]("Enter contact number properly");
        return;
    }

    $.ajax({
        type: "POST",
        url: addStaffUrl,
        data: {name:name,email:email,contact:contact,_token: token},
        success: function (data) {
            if(data.id == ''){
                toastr["error"](data.msg);
                return;
            }else{
                $('#staff_value').modal('hide');
                $('#staff_choice').append('<option value="'+data.id+'">'+name+'</option>');
                toastr["success"](data.msg);
            }
        }
    });
}


function addContact(id) {
    var name = $('#contact_name').val();
    var email = $('#contact_email').val();
    var phone = $('#contact_phone').val();


    if(name == ''){
        toastr["error"]("Enter name");
        return;
    }

    if(email == ''){
        toastr["error"]("Enter email");
        return;
    }

    if(phone == ''){
        toastr["error"]("Enter contact number properly");
        return;
    }

    if(id == 0){
        $.ajax({
            url:addContactUrl,
            type:"POST",
            data:{name:name,email:email,phone:phone,_token:token},
            success:function(data){
                $('#Modal').modal('hide');
                $('#contact_table').append('<tr><td>'+name+'</td><td>'+email+'</td><td>'+phone+'</td></tr>');
            }
        });
    }else{
        $.ajax({
            url:addContactUrl,
            type:"POST",
            data:{name:name,email:email,phone:phone,_token:token,event_id:id},
            success:function(data){
                $('#Modal').modal('hide');
                $('#contact_table').append('<tr><td>'+name+'</td><td>'+email+'</td><td>'+phone+'</td></tr>');
            }
        });
    }

}
