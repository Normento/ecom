const { result } = require("lodash");
const { default: swal } = require("sweetalert");

$(document).ready(function () {
    //datatables
    $("#section").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        responsive: true,
    });

    $(".nav-item").removeClass("active");
    $(".nav-link").removeClass("active");
    //cheick if admin password is correct or not
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-current-password",
            data: { current_password: current_password },
            success: function (resp) {
                if (resp == "false") {
                    $("#check_password").html(
                        "<font color='red'>Current Password is not correct"
                    );
                } else if (resp == "true") {
                    $("#check_password").html(
                        "<font color='green'>Current Password is correct"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Upadate admin status

    $(document).on("click", ".updateAdminStatus", function () {
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-admin-status",
            data: { status: status, admin_id: admin_id },
            success: function (resp) {
                //alert(resp);
                if (resp["status"] == 0) {
                    $("#admin-" + admin_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else if (resp["status"] == 1) {
                    $("#admin-" + admin_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Update section status

    $(document).on("click", ".updateSectionStatus", function () {
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-section-status",
            data: { status: status, section_id: section_id },
            success: function (resp) {
                //alert(resp);
                if (resp["status"] == 0) {
                    $("#section-" + section_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else if (resp["status"] == 1) {
                    $("#section-" + section_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Update category status

    $(document).on("click", ".updateCategoryStatus", function () {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        alert(category_id);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-category-status",
            data: { status: status, category_id: category_id },
            success: function (resp) {
                //alert(resp);
                if (resp["status"] == 0) {
                    $("#category-" + category_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else if (resp["status"] == 1) {
                    $("#category-" + category_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    // Comfirm delete

    /* $(".ComfirmDelete").click(function () {
        var module = $(this).attr("module");
        var moduleid = $(this).attr("moduleid");
        //alert(moduleid);
        Swal({
            title: "Are you sure?",
            text: "Once deleted, you won't be able to revert this",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Deleted!", "your file has been deleted.", "success");
                window.location = "/admin/delete-" + module + "/" + moduleid;
            }
        });
    }); */

    //append categories level

    $("#section_id").change(function () {
        var section_id = $(this).val();
        //alert(section_id);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "get",
            url: "/admin/append-categories-level",
            data: { section_id: section_id },
            success: function (resp) {
                //alert(resp);
                $("#appendCategoriesLevel").html(resp);
            },
            error: function () {
                alert("Error");
            },
        });
    });

    // update brands status

    $(document).on("click", ".updateBrandStatus", function () {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");
        alert(brand_id);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-brand-status",
            data: { status: status, brand_id: brand_id },
            success: function (resp) {
                //alert(resp);
                if (resp["status"] == 0) {
                    $("#brand-" + brand_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else if (resp["status"] == 1) {
                    $("#brand-" + brand_id).html(
                        '<i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
});
