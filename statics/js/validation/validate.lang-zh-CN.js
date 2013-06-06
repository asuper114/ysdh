(function($) {
$.validator.messages= $.extend( $.validator.messages, { required: {defaults:"不能为空",checkbox:"请至少选择一项",select:"请选择此项"},
		remote: "Please fix this field.",
		email: "请输入有效的电子邮件地址.",
		//gavin
		email_mobile: "请输入有效的电子邮件地址或者手机号.",
		alphanumeric:"请输入字母、数字或者下划线",
		url: "请输入有效的地址.",
		date: "请输入有效的日期.",
		dateITA: "请输入有效的日期.",
		//gavin
		mobile: "请输入正确的手机号码.",
		dateISO: "Please enter a valid date (ISO).",
		dateDE: "Bitte geben Sie ein g眉ltiges Datum ein.",
		number: "请输入有效的数字.",
		numberDE: "Bitte geben Sie eine Nummer ein.",
		digits: "请输入阿拉伯数字.",
		creditcard: "Please enter a valid credit card.",
		equalTo: {defaults:"请输入相同的内容",password:"两次输入的密码不一致."},
		accept: "这个扩展名不被接受.",
		//gavin
		regex: "请输入符合要求的内容.",
		maxlength: {defaults:$.format("请输入最多 {0} 个字符."),checkbox:$.format("请最多选择 {0} 项."),select:$.format("请最多选择 {0} 项.")},

		
		minlength: {defaults:$.format("请输入至少 {0} 个字符."),checkbox:$.format("请至少选择 {0} 项."),select:$.format("请至少选择 {0} 项.")},

		
		rangelength: {defaults:$.format("请输入 {0} 到 {1} 个字符."),checkbox:$.format("请选择 {0} 项 到 {1} 项."),select:$.format("请选择 {0} 项 到 {1} 项.")},
		range: $.format("请输入 {0} 到 {1} 之间的值."),
		
		max: $.format("最大值不能超过 {0}."),
		
		min: $.format("最小值不能低于 {0}."),
		username:$.format("请输入长度不少于 {0}个的字母、数字、下划线的组合或者2个以上中文")
    });
	

})(jQuery);