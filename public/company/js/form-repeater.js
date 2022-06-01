var FormRepeater = function() {
    return {
        init: function() {
            $(".mt-repeater").each(function() {
                $(this).repeater({
                    show: function() {
                        $(this).slideDown(),
                        $(".date-picker").datepicker({
                            rtl: App.isRTL(),
                            orientation: "left",
                            autoclose: !0
                        }),

                    //added-this-to-explicity-run-timepicker...
                        jQuery().timepicker && ($(".timepicker-default").timepicker({
                            autoclose: !0,
                            showSeconds: !0,
                            minuteStep: 1
                        }), $(".timepicker-no-seconds").timepicker({
                            autoclose: !0,
                            minuteStep: 5,
                            defaultTime: !1
                        }), $(".timepicker-24").timepicker({
                            autoclose: !0,
                            minuteStep: 5,
                            showSeconds: !1,
                            showMeridian: !1
                        }), $(".timepicker").parent(".input-group").on("click", ".input-group-btn", function(t) {
                            t.preventDefault(), $(this).parent(".input-group").find(".timepicker").timepicker("showWidget")
                        }), $(document).scroll(function() {
                            $("#form_modal4 .timepicker-default, #form_modal4 .timepicker-no-seconds, #form_modal4 .timepicker-24").timepicker("place")
                        })),

                        jQuery().clockface && ($(".clockface_1").clockface(), $("#clockface_2").clockface({
                            format: "HH:mm",
                            trigger: "manual"
                        }), $("#clockface_2_toggle").click(function(t) {
                            t.stopPropagation(), $("#clockface_2").clockface("toggle")
                        }), $("#clockface_2_modal").clockface({
                            format: "HH:mm",
                            trigger: "manual"
                        }), $("#clockface_2_modal_toggle").click(function(t) {
                            t.stopPropagation(), $("#clockface_2_modal").clockface("toggle")
                        }), $(".clockface_3").clockface({
                            format: "H:mm"
                        }).clockface("show", "14:30"), $(document).scroll(function() {
                            $("#form_modal5 .clockface_1, #form_modal5 #clockface_2_modal").clockface("place")
                        }));
                    },
                    hide: function(e) {
                        confirm("هل أنت متأكد من حذف هذا العنصر؟") && $(this).slideUp(e)
                    },
                    ready: function(e) {}
                })
            })
        }
    }
}();
jQuery(document).ready(function() {
    FormRepeater.init()
});