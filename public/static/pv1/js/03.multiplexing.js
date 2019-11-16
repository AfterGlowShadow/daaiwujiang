function primaryFormController () {
    var onFormSubmitButton = document.getElementById("form-button");

    if(onFormSubmitButton) {
        onFormSubmitButton.addEventListener("click", function() {
            if(common.loading) return false; else common.loading = true;
        
            var url = document.getElementById("form-url").value,
                form = {
                    name: document.getElementById("form-name").value,
                    phone: document.getElementById("form-phone").value,
                    content: document.getElementById("form-content").value
                };
        
            if(!form.name || form.phone || form.content) {
                alert("所有项都需要填写，才可以提交！");
                common.loading = false;
                return false;
            }
        
            common.ajaxRequest({
                url: url,
                type: "POST",
                data: form,
                success: function(res) {
                    alert("提交成功");
                    common.loading = false;
                },
                fail: function(frs) {
                    common.loading = false;
                }
            });
        });
    }
}
