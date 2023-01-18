let app = new Vue({
    el: "#app",
    data: {
        userId: 0,
        message1: '',
        message2: '',
        message3: '',
        message4: '',
        messages: [],

        userEmail: '',
        userPhone: '',
        userName: '',
        userCpf: '',
        userName: '',

        modelUsername: '',
        modelPhone: '',
        modelCpf: '',
        modelEmail: '',

        cepModel: '',
        cityModel: '',
        stateModel: '',
    },
    methods:{
        sendMessage(message){
            this.messages.push({name: message});
            this.message1 = '';
            this.message2 = '';
            this.message3 = '';
            this.message4 = '';

            fetch('/api/saveMessage', {
                method: "post",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({message: message, user_id: this.userId})
              })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
        },

        getApiMessages(userId){
            fetch('/api/getMessages/' + userId, {
                method: "get",
              })
                .then(response => response.json())
                .then(data => {
                    this.messages = data;
                });
        },

        getApiUsersByEmail(identifier){
            fetch('/api/user/' + identifier, {
                method: "get",
              })
                .then(response => response.json())
                .then(data => {
                    if(data){
                        this.userPhone = '',
                        this.userName = '',
                        this.userCpf = '',

                        this.userEmail = data.name;
                        this.userId = data.id,
                        this.modelEmail = '';
                        document.querySelector('#start4').style.display = "none";
                        document.querySelector('#button4').removeAttribute("disabled");
                        document.querySelector('#input4').removeAttribute("disabled");
                        this.blockOthers("4");
                    }else{
                        alert('User not found');
                    }
                });
        },

        getApiUsersByPhone(identifier){
            fetch('/api/user/' + identifier, {
                method: "get",
              })
                .then(response => response.json())
                .then(data => {
                    if(data ){
                        this.userEmail = '',
                        this.userName = '',
                        this.userCpf = '',

                        this.userPhone = data.name;
                        this.userId = data.id,
                        this.modelPhone = '',
                        document.querySelector('#start2').style.display = "none";
                        document.querySelector('#button2').removeAttribute("disabled");
                        document.querySelector('#input2').removeAttribute("disabled");
                        this.blockOthers("2");
                    }else{
                        alert('User not found');
                    }
                });
        },

        getApiUsersByCpf(identifier){
            fetch('/api/user/' + identifier, {
                method: "get",
              })
                .then(response => response.json())
                .then(data => {
                    if(data ){
                        this.userEmail ='',
                        this.userPhone = '',
                        this.userName = '',

                        this.userCpf = data.name;
                        this.userId = data.id,
                        this.modelCpf = '',
                        document.querySelector('#start3').style.display = "none";
                        document.querySelector('#button3').removeAttribute("disabled");
                        document.querySelector('#input3').removeAttribute("disabled");
                        this.blockOthers("3");
                    }else{
                        alert('User not found');
                    }
                });
        },

        getApiUsersByUsername(identifier){
            fetch('/api/user/' + identifier, {
                method: "get",
              })
                .then(response => response.json())
                .then(data => {
                    if(data){
                        this.userEmail = '',
                        this.userPhone = '',
                        this.userCpf = null,

                        this.userName = data.name;
                        this.userId = data.id,
                        this.modelUsername = '',
                        document.querySelector('#start1').style.display = "none";
                        document.querySelector('#button1').removeAttribute("disabled");
                        document.querySelector('#input1').removeAttribute("disabled");
                        this.blockOthers("1");
                        
                        this.getApiMessages(data.id);
                    }else{
                        alert('User not found');
                    }
                });
            
        },

        blockOthers(myDivId){
            let ids = ["1", "2", "3", "4"];
            ids.splice(ids.indexOf(myDivId), 1);
            console.log(ids);
            ids.forEach(element => {
                document.querySelector('#start'+element).style.display = "block";
                document.querySelector('#button'+element).setAttribute("disabled", true);
                document.querySelector('#input'+element).setAttribute("disabled", true);
            });
        },

        getCep(cep){
            fetch(`api/cep/${cep}`, {
                method: "get",
              })
                .then(response => response.json(), this.loaded = true)
                .then(data => {
                    if(data != 'error'){
                        console.log(data);
                        this.cityModel = data.localidade;
                        this.stateModel = data.uf;
                        document.querySelector('#cityInput').removeAttribute("disabled")
                        document.querySelector('#stateInput').removeAttribute("disabled")
                    }else{
                        alert("Digite um cep válido");
                    }

                });
            
        }
    }
});