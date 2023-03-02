$(document).ready(function () {
    DethiController.init();
});

$(document).on("change","input[type=radio]",function(){
    let item = $(this).parent().closest('.quiz-form__quiz').attr('id');
    let arr = item.split("_");
    let id = arr[arr.length - 1];
    $("#link_tab_" + id).parent().removeClass('question_active');
    $("#link_tab_" + id).parent().addClass('nenxanh');
});

var DethiController = {
    init: function () {
        DethiController.submit();
        DethiController.nopBai();
        DethiController.thilai();
        DethiController.scrollToID('#take-exam', 1000);
        DethiController.submitAnswer();

        $('.numberCircle').click(function () {
            $('.numberCircle').removeClass('question_active');
            $(this).addClass('question_active');
        });
    },

    submit() {
        $('#nopbai2').click(function () {
            var inputs = document.getElementById("form").elements;
            var count  = 0;
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type == 'radio' && inputs[i].checked) {
                    count++;
                }
            }
            let nopbai = window.confirm("Nộp bài. Bạn có chắc không?");
            if (nopbai) {
                showLoading();
                document.getElementById('form').submit();
            }
            hideLoading();
            return true;
        });
    },

    nopBai() {
        $('#nopbai1').click(function () {
            var inputs = document.getElementById("form").elements;
            var count  = 0;
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type == 'radio' && inputs[i].checked) {
                    count++;
                }
            }
            let nopbai = window.confirm("Nộp bài. Bạn có chắc không?");
            if (nopbai) {
                showLoading();
                document.getElementById('form').submit();
            }
            hideLoading();
            return true;
        });
    },

    thilai() {
        $('#thilai').click(function () {
            let thilai = window.confirm("Thi lại, đồng nghĩa với kết quả bài thi trước đó sẽ bị hủy bỏ. Bạn có chắc chắn không?");
            return thilai ? true : false;
        });
    },

    scrollToID: function (selector, speed) {
        var offSet = 0;
        var obj = $(selector);
        if (obj.length) {
            var offs = obj.offset();
            var targetOffset = offs.top - offSet;
            $('html,body').animate({scrollTop: targetOffset}, speed);
        }
    },

    submitAnswer: function () {
        $('input[type=radio]').change(function () {
            let dap_an = this.value;
            let DA_Dung = $(this).parent().closest('.quiz-form__quiz').find('input[name="DA_Dung"]').val();
            let ma_de_thi = $('input[name="ma_de_thi"]').val();
            let id_thi_sinh = $('input[name="id_thi_sinh"]').val();
            let id_cau_hoi = $(this).parents('.quiz-form__quiz').find('input[name="id_cau_hoi"]').val();
            let user_quiz_number = $(this).parents('.quiz-form__quiz').find('input[name="user_quiz_number"]').val();

            let data = {
                'dap_an': dap_an,
                'ma_de_thi': ma_de_thi,
                'id_cau_hoi': id_cau_hoi,
                'id_thi_sinh': id_thi_sinh,
                'DA_Dung': DA_Dung,
                'user_quiz_number': user_quiz_number,
            };

            showLoading();

            var url = $('input[name="post_thi_thu_url"]').val();
            var csrf = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: url,
                headers: {'X-CSRF-TOKEN': csrf},
                data: data,
                cache: false,
                success: function (response) {
                    switch (response.status) {
                        case 201:
                            location.reload();
                        case 200:
                            console.log('Submit answer successfully ... ');
                            break;
                        default:
                            console.log('Submit answer error ... ')
                    }
                    hideLoading();
                },
                error: function (e) {
                    console.log('Submit answer error ... ')
                    hideLoading();
                }
            });
            hideLoading();
        })
    }

};