console.log("hello")

var getsubmit = document.querySelector(".submit")
getsubmit.addEventListener('click', function() {
    alert("Dell ai quan tam")
})

$(function() {

	'use strict';

	// Form

	var contactForm = function() {

		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					name: {
                        required: true,
                        minlength: 2
                    },
					email: {
						required: true,
						email: true
					},
					message: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					name: "Vui lòng nhập tên của bạn",
					email: "Vui lòng nhập địa chỉ email của bạn",
					message: "Vui lòng để lại lời nhắn"
				},
            })
        }
    }
    contactForm();
})