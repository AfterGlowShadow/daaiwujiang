var ServiceSubject = new Vue({
    el: "#ServiceSubject",
    data: {
        loading: false,
        dataset: [{}]
    },
    methods: {
        controllerRequestDataset: function(idx) {
            if(this.loading) return; else this.loading = true;

            var that = this;
            common.ajaxRequest({
                url: "",
                type: "POST",
                data: {
                    id: idx
                },
                success: function(response) {
                    res = JSON.parse(response);
                    if(res.status == "ok") {
                        that.dataset = that.buildDataStructure(res.data);
                    }
                    that.loading = false;
                },
                fail: function(frs) {
                    that.loading = false;
                }
            });
        },
        buildDataStructure: function(data) {
            var result = [], arr = [];
            for(var i = 0; i < data.length; i++) {
                arr.push({
                    image: data[i].image,
                    title: "",
                    resume: "",
                    link: ""
                });
                
                if(i%2 > 0) {
                    result.push(arr);
                    arr = [];
                }
            }
        }
    }
});
