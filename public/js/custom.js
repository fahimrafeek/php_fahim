$(document).ready(function () {

    initPage();

    $("#image").change(function() {
        imagePreview(this);
    });

});

function initPage() {
    setTimeout(function () {
        $("#alert-danger").hide();
    }, 5000);
    setTimeout(function () {
        $("#alert-success").hide();
    }, 5000);
}

function deleteUser(user_id) {
    if(user_id != "" && user_id != undefined) {
        if(confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                type: "POST",
                url: "/users/delete",
                data: {user_id: user_id},
                success: function (data, textStatus, jQxhr) {
                    window.location.reload();
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }else {
            return false;
        }
    }else{
        return false;
    }
}

function deleteSalesRepresentative(id) {
    if(id != "" && id != undefined) {
        if(confirm("Are you sure you want to delete this sales representative?")) {
            $.ajax({
                type: "POST",
                url: "/sales-representatives/delete",
                data: {id: id},
                success: function (data, textStatus, jQxhr) {
                    window.location.reload();
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }else {
            return false;
        }
    }else{
        return false;
    }
}

function imagePreview(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
  
