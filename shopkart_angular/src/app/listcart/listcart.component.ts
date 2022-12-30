import { Component, OnInit } from '@angular/core';
import { CartService } from '../cart.service';
import { CategoryService } from '../category.service';



@Component({
  selector: 'app-listcart',
  templateUrl: './listcart.component.html',
  styleUrls: ['./listcart.component.css']
})
export class ListcartComponent implements OnInit {

  categories:any=[];
  cname:any="";
  cid:any="";
  carts:any="";
  qty:any="";
  bname:any="";
  bphone:any="";
  baddress:any="";
  sname:any="";
  sphone:any="";
  saddress:any="";
  


  constructor(private cat: CategoryService, private cart:CartService) { }

  corder(val:any){

    this.cid=localStorage.getItem("cid");

    var fd=new FormData();
    fd.append("bname",val.bname);
    fd.append("bphone",val.bphone);
    fd.append("baddress",val.baddress);
    fd.append("sname",val.sname);
    fd.append("sphone",val.sphone);
    fd.append("saddress",val.saddress);
    fd.append("cid",this.cid);
    this.cart.cforder(fd).subscribe((data:any)=>{

      console.log(data);

    });


  }

  same(ev:any) {
    if(ev.target.checked==true) {
      
      this.sname=this.bname;
      this.sphone=this.bphone;
      this.saddress=this.baddress;
    }
    else {
      this.sname="";
      this.sphone="";
      this.saddress="";
    }
  }

  selcat()
  {
    this.cat.getcat().subscribe((data:any)=>{
        this.categories=data;
      });
  }

  cupd(cart_id:any, price:any, ev:any) {

    this.qty=ev.target.value;

    var fd=new FormData();
    fd.append("cart_id",cart_id);
    fd.append("price",price);
    fd.append("qty",this.qty);
    this.cart.updcart(fd).subscribe((data:any) => {
      
      this.getcart();

    });
  }

  delcart(cart_id:any){

    if(window.confirm('Are you sure?')) {

      var fd = new FormData();
      fd.append("cart_id",cart_id);
      
      this.cart.delcart(fd).subscribe((data:any) => {
        
        this.getcart();

      });
    }
  }

  getcart() {


    this.cid=localStorage.getItem("cid");

    var fd=new FormData();
    fd.append("cid",this.cid);


    this.cart.listcart(fd).subscribe((data:any)=> {
      
      this.carts=data;
    });
  }

  logout() {
    localStorage.removeItem("cname");
    localStorage.removeItem("cid");
    window.location.href="/";
  }

  ngOnInit(): void {

    this.cname=localStorage.getItem("cname");

    this.selcat();
    this.getcart();
  }

}
