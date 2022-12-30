import { Component, OnInit } from '@angular/core';
import { CartService } from '../cart.service';


@Component({
  selector: 'app-orderhistory',
  templateUrl: './orderhistory.component.html',
  styleUrls: ['./orderhistory.component.css']
})
export class OrderhistoryComponent implements OnInit {

  carts:any=[];
  orders:any=[];
  cid:any="";
  cname:any="";
  
  constructor(private cart:CartService) { }

  getcart(){

    this.cid=localStorage.getItem("cid");
    
    var fd=new FormData();
    fd.append("cid",this.cid);
      
    this.cart.listorder(fd).subscribe((data:any)=>{
        
      this.orders=data;
         
    });
    
  }

  logout() {
    localStorage.removeItem("cname");
    localStorage.removeItem("cid");
    window.location.href="/";
  }

  ngOnInit(): void {

    this.cname=localStorage.getItem("cname");
    this.getcart();
  }

}
