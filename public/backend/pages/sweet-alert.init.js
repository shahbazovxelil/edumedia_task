! function (e) {
    "use strict";
    var del = function () {};
    del.prototype.init = function () {
      e(".sa-warning").on("click", function () {
            swal({
                title: "Əminsinizmi ?",
                text: "Əgər silsəniz bərpa edə bilməyəcəksiniz!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Sil",
                closeOnConfirm: !1
            }, function () {
                swal("Silindi!", "Siz məlumatı sildiniz.", "success")
            })
        })
    }, e.SweetAlert = new del, e.SweetAlert.Constructor = del
}(window.jQuery),
function (e) {
    "use strict";
    window.jQuery.SweetAlert.init()
}();
