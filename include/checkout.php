<script>
    
    let Lcart = JSON.parse(localStorage.getItem('Cart'));
    let Lcartq = JSON.parse(localStorage.getItem('Cartq'));
    let Lprice = JSON.parse(localStorage.getItem('Price'));
    let Lsize = localStorage.getItem('Index');
    let Lname = localStorage.getItem('Name');
    let Lmail = localStorage.getItem('Mail');
    let Ladr = localStorage.getItem('Adress');
    
    console.log(Lcart);
    console.log(Lcartq);
    console.log(Lsize);
    var index=0;
    let id = Lcart[index];
    let qt = Lcartq[index];
    let pr = Lprice[index];
    
    function compras(){
        for (; index < Lsize; index++) {
            id = Lcart[index];
            qt = Lcartq[index];
            pr = Lprice[index];
            GFG_Fun();
        }
    }
 
 
 
 
    var down = document.getElementById("GFG_DOWN");
           
    // Create a break line element
    var br = document.createElement("br");
    
    var form;
    
    
    //Function-----------------------
    function GFG_Fun() {
               
    // Create a form dynamically
    form = document.createElement("form");
    //Atributes
    
    form.setAttribute("method", "post");
    form.setAttribute("action", "submit.php");
 
    // Create an input element for IdProducto
    var FN = document.createElement("input");
    FN.setAttribute("type", "text");
    FN.setAttribute("readonly",true);
    FN.setAttribute("name", "IdProducto");
    FN.setAttribute("value", id);
 
     // Create an input element for date of Precio
     var DOB = document.createElement("input");
     DOB.setAttribute("type", "text");
     DOB.setAttribute("readonly",true);
     DOB.setAttribute("name", "Precio");
     DOB.setAttribute("value", pr);
 
     // Create an input element for Comprador
     var EID = document.createElement("input");
     EID.setAttribute("type", "text");
     EID.setAttribute("readonly",true);
     EID.setAttribute("name", "Comprador");
     EID.setAttribute("value", Lname);
     
     // Create an input element for Mail
     var MIT = document.createElement("input");
     MIT.setAttribute("type", "text");
     MIT.setAttribute("readonly",true);
     MIT.setAttribute("name", "Mail");
     MIT.setAttribute("value", Lmail);
     
     // Create an input element for Adress
     var ADR = document.createElement("input");
     ADR.setAttribute("type", "text");
     ADR.setAttribute("readonly",true);
     ADR.setAttribute("name", "Adress");
     ADR.setAttribute("value", Ladr);
 
      // Create an input element for Cantidad
      var PWD = document.createElement("input");
      PWD.setAttribute("type", "number");
      PWD.setAttribute("readonly",true);
      PWD.setAttribute("name", "Cantidad");
      PWD.setAttribute("value", qt);
 
 
                // create a submit button
                var s = document.createElement("input");
                s.setAttribute("type", "submit");
                s.setAttribute("value", "Pagar");
                
                 
                // Append the full name input to the form
                form.appendChild(FN);
                 
                // Inserting a line break
                form.appendChild(br.cloneNode());
                 
                // Append the DOB to the form
                form.appendChild(DOB);
                form.appendChild(br.cloneNode());
                 
                // Append the Comprador to the form
                form.appendChild(EID);
                form.appendChild(br.cloneNode());
                
                // Append the Mail to the form
                form.appendChild(MIT);
                form.appendChild(br.cloneNode());
                
                // Append the Adress to the form
                form.appendChild(ADR);
                form.appendChild(br.cloneNode());
                 
                // Append the Password to the form
                form.appendChild(PWD);
                form.appendChild(br.cloneNode());
                 
                
                 
                // Append the submit button to the form
                form.appendChild(s);
 
                document.getElementsByTagName("body")[0]
               .appendChild(form);
            }
        </script>
<html>
    <head>
        <title>
            Tienda Omar
        </title>
    </head>
    <body style="text-align: center;">
        <h1 style="color: green;">
            CheckOut
        </h1>
        
        
        
        <p>
          Lista de productos a pagar:
          <script>
            compras();
            </script>
        </p>
        
        <p id="GFG_DOWN"></p>
 
    </body>
</html>