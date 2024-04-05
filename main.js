
        let itemnames=["Redmi Note 10S cover","OnePlus Nord","HP pavillion","Boat bassheads","Ambrane car charger","MI mobile charger"];
        let price=[180,16000,56000,200,450,999];

        let ar=new Array(6);
        for(let i=0;i<ar.length;i++)
                ar[i]=0;
        
        function marke(did,eid,ind){
            let f=document.getElementById(eid);
            var divv=document.getElementById(did);
            if(ar[ind]!=0)
            {   
                ar[ind]=0;
                document.getElementById(did).style.borderColor="red";
                f.innerHTML="Price : ₹"+price[ind];
                divv.addEventListener('mouseover',function(){
                divv.style.backgroundColor='#fdf3f4';
                })
            }
            else
            {
                ar[ind]=prompt("Enter number of items to purchase :");
                
                while(ar[ind]==0 || ar[ind]==null)
                {
                    ar[ind]=prompt("Enter number of items to purchase :");
                }
                divv.style.borderColor="green";
                divv.addEventListener('mouseover',function(){
                divv.style.backgroundColor="#ddf0dd";
                })
                f.innerHTML=ar[ind]+" Items added to cart";
            }

            divv.addEventListener('mouseleave',function(){
                divv.style.backgroundColor="white";
                })
            
        }

        function save()
        {   let flag=0;
            for(let i=0;i<ar.length;i++)
            {
                if(ar[i]!=0)
                {
                    flag=1;
                    break;
                }
            }
            if(flag==1)
            {
                localStorage.setItem("itemcount",JSON.stringify(ar));
                document.cookie="itemc="+JSON.stringify(ar);
                
                window.location.href="verifystock.php";
            }
            else
                alert("No items selected for Buying !");

        }

        function clear1()
        {
            localStorage.clear();
        }
        function getCookieValue(name) 
        {
            const regex = new RegExp(`(^| )${name}=([^;]+)`)
            const match = document.cookie.match(regex)
            if (match) {
                return match[2]
            }
        }

        function tableCreate() 
        {   
            //Time
            const time = Date.now();
            const date = new Date(time);
            const currentDate = date.toString();
            document.querySelector('p').innerHTML = "Order Id : SE"+getCookieValue('orderid')+"<br/><br/>Order Date and Time : "+currentDate+"<br><br>Delivery Address :"+localStorage.getItem('address');


            const body = document.body,tbl = document.createElement('table');
            var tr,td;
            tbl.style.width = '700px';
            tbl.style.border = '1px solid black';
            tbl.style.height='200px';
            
            let itemcntar=JSON.parse(localStorage.getItem("itemcount"));
            let tablhead=['Item Name','Price/Item','Quantity','Price'];
            
            tr=tbl.insertRow();
            for(let i=0;i<4;i++)
            {
                td=tr.insertCell();
                td.appendChild(document.createTextNode(tablhead[i]));
                td.style.border = '1px solid black';
            }
            
            
            for (let j = 0; j < itemcntar.length; j++) {
                if(itemcntar[j]==0)
                    continue;
                tr = tbl.insertRow();
               
                td = tr.insertCell();
                td.appendChild(document.createTextNode(itemnames[j]));
                td.style.border = '1px solid black';
                
                td = tr.insertCell();
                td.appendChild(document.createTextNode(price[j]));
                td.style.border = '1px solid black';

                td = tr.insertCell();
                td.appendChild(document.createTextNode(itemcntar[j]));
                td.style.border = '1px solid black';

                td = tr.insertCell();
                td.appendChild(document.createTextNode(price[j]*itemcntar[j]));
                td.style.border = '1px solid black';
                
            }
            tr=tbl.insertRow();

            td=tr.insertCell();
            td.appendChild(document.createTextNode('Total :'));
            td.colSpan="3";
            td.style.border='1px black solid';

            let total=getCookieValue('total');
            td=tr.insertCell();
            td.appendChild(document.createTextNode("₹ "+total));
            td.style.border='1px black solid';

            tbl.style.textAlign='center';
          
            document.getElementById('p1').appendChild(tbl);

            document.getElementById('p2').appendChild(document.createTextNode("\n\nNote : Order will be delivered within 2-3 days !"));

            document.getElementById('p3').appendChild(document.createTextNode("Thank You for shopping with SaathE !"));
        }              

        function generateinv()
        {
            document.querySelector('title').innerHTML="SE"+getCookieValue('orderid');
            document.querySelector('body').style.backgroundColor="white";
            document.getElementById('mhead').style.display="block";
            window.print();
            window.location.href="saveorder.php";
        }

        function saveform()
        { 
                let adrtype=document.querySelector('input[name="r1"]:checked').value;
                let localty=document.getElementById('locality').value;
                let cty=document.getElementById('city').value;
                let pncode=document.getElementById('pincode').value;
                let mno=document.getElementById('mobno').value;
                let nme=document.getElementById('name').value;

                if(localty==='' || cty===''||pncode.length!=6||mno.length!=10 || nme==='')
                    alert('Please enter valid data !');
                else
                {
                    let adr=" : "+nme+", "+localty+", "+cty+" "+pncode+" Mob No : "+mno;
                    localStorage.setItem('address',adr);
                    document.cookie="mobno ="+mno;
                    document.cookie="adrtype ="+adrtype;
                    document.cookie="city ="+cty;
                    document.cookie="pincode ="+pncode;
                    document.cookie="locality ="+localty;
                    document.cookie="name ="+nme;
                    window.location.href="qrpage.html";
                }

        }