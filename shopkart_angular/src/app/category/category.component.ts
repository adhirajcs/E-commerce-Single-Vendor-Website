import { Component, OnInit } from '@angular/core';
import { CategoryService } from '../category.service';
import { ProductService } from '../product.service';
import { ActivatedRoute } from '@angular/router';
import { CartService } from '../cart.service';




@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css']
})
export class CategoryComponent implements OnInit {

  categories:any=[];
  products:any=[];
  pcat:any="";

  cname:any="";
  cid:any="";

  constructor(private cat: CategoryService,private ps:ProductService,private ar:ActivatedRoute, private cs:CartService) { }

  selcat()
  {
    this.cat.getcat().subscribe(
      (data:any)=>{
        this.categories=data;
      }
    )
  }

  selprocat()
  {

    this.ar.params.subscribe((urldata:any)=> {

      this.pcat=urldata.catparam;
      var fd=new FormData();
      fd.append("cat",this.pcat);


      this.ps.getpcat(fd).subscribe((data:any)=> {
        this.products=data;
      })
    })

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
    this.selprocat();
    }
  }
