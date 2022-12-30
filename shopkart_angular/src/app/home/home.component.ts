import { Component, OnInit } from '@angular/core';
import { CartService } from '../cart.service';
import { CategoryService } from '../category.service';
import { ProductService } from '../product.service';



@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  categories:any=[];
  products:any=[];

  cname:any="";
  cid:any="";

  constructor(private cat: CategoryService,private ps:ProductService, private cs:CartService) { }

  selcat()
  {
    this.cat.getcat().subscribe(
      (data:any)=>{
        this.categories=data;
      });
  }

  selpro()
  {
    this.ps.getp().subscribe((data:any)=>{
      this.products=data;
    });
  }

  logout() {
    localStorage.removeItem("cname");
    localStorage.removeItem("cid");
    window.location.href="/";
  }

  act(val:any) {
    this.cid=localStorage.getItem("cid");

    var fd=new FormData();
    fd.append("pid",val.pid);
    fd.append("cid",this.cid);
    fd.append("cprice",val.cprice);
    fd.append("qty",val.qty);

    this.cs.addcart(fd).subscribe((data:any)=> {
      console.log(data);
    });
  }
  
  ngOnInit(): void {

    this.cname=localStorage.getItem("cname");

    this.selcat();
    this.selpro();
    }
  }
