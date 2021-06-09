$(function () {
    $("#rep_btn").click(function () {
        $.ajax({
            url: "./reply_ok.php",
            type: "post",
            data: {
                "idx": $(".idx").val(),
                "dat_user": $(".dat_user").val(),
                "rep_con": $(".rep_con").val()
            },
            success: function (data) {
                alert("등록 되었습니다.");
                location.reload();
            }
        });
    });

    $("#del_btn").click(function () {
        $.ajax({
            url: "./reply_del.php",
            type: "post",
            data: {
                "r_no": $(".r_idx").val(),
                "b_no": $(".b_idx").val(),
            },
            success: function (data) {
                alert("댓글이 삭제 되었습니다.");
                location.reload();
            }
        });
    });
});