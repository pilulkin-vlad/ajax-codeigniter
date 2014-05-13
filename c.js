var sendQ = {}

function sendClass(){
    this.constr = function(){}; //constructor
    this.send = function(t,d){
        if(((t != undefined)&&(d != undefined))&&((t != '')&&(d != ''))){
            $.ajax({
                type: "POST",
                url: "/send",
                data: {type : t,data : d},
                success: function(r){if(r != ''){sendQ.obrSend(t);}else{console.log('error_response_empty');}}
            });
        } else {
            console.log('error_send_arguments');
        }
    };
    this.obrSend = function(r){
        switch(r){
            case 'error_isset_send':
                console.log('Запрос на сервер не правильно сформирован.');
                break;
            case 'error_empty_data':
                console.log('Запрос на сервер пустой.');
                break;
            case 'error_type_send':
                console.log('Тип запроса не правильный.');
                break;
            default :
                console.log('Ответ сервера - ' + r);
                break;
        }
    };
    this.constr();
}

function autoload(){
    sendQ = new sendClass();
    //-------------------------------------------------
    //--------------- test send query -----------------
    //-------------------------------------------------
    sendQ.send('types',{'type1' : 'postdata1','type2' : 'postdata2'});
    //-------------------------------------------------
    //--------------- test send query -----------------
    //-------------------------------------------------
}
$(document).ready(function(){autoload();});
