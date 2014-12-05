var funtionName="";
//cre un objeto botonos, con sus propiedades, que luego utilizo para los dialofos
var mybtns=[{text:"Aceptar",click:function(){actionGeneral(funtionName);}},{text:"Cancelar",click:function(){$(this).dialog("close");}}];
//el objeto options va a contener las configuraciones del dialog y los botones
var options={autoOpen:true,title:"",width:"auto",height:"auto",buttons:mybtns,close:function(){}};

 //---------------------------------------------------------------------------------------------------------------------------------
//funcion para mostrar dialogos  
function show_message(contenedor,ancho,alto,titulo,btn1,btn2,tipo,data){
      //aca almaceno los botones
      var mybtns=[];
      //si se va a mostrar un formulario entonces muestro estos botones     
      if(tipo=='form'){
          mybtns=[{text:btn1,click:function(){ validate_sent(objpasoApaso.destination);$(".form").submit();}},{text:btn2,click:function(){$(this).dialog("close");}}];
      }
      //si se va a mostrar un mensaje entonces seteo estos botones 
       else if(tipo=='msj'){
         mybtns=[{text:btn1, click:function(){
                     $(this).dialog("close");
                     if(data){
                                 if(data.funcion!=''){
                                     if(data.funcion=="continuar_process"){
                                      continuar_process(data);
                                     }
                                 }
                              }
                 }}];
       }
       else if(tipo=='verificar'){
           mybtns=[{text:btn1, click:function(){
                       if(data.funcion=='delete'){delete_process(data);}
                       else if(data.funcion=='seguir'){continuar_process(data);}
                    }},
                   {text:btn2, click:function(){(this).dialog("close"); }}
                  ];
       }
       //inicializo las opciones del dialogo 
       var options={autoOpen:true,modal:true,width:ancho,height:alto,title:titulo,buttons:mybtns};
       //abro la caja con las opciones y los botones previamente seteados
       $(contenedor).dialog(options);      

   }