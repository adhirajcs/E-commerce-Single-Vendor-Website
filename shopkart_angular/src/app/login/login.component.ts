import { Component, OnInit } from '@angular/core';
import { CategoryService } from '../category.service';
import 'jquery';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  categories: any = [];
  msg:any = "";
  errmsg:any="";

  constructor(private cat: CategoryService, private auth:AuthService) { }
  selcat() {
    this.cat.getcat().subscribe((data: any) => {
      this.categories = data;

      });
  }

  login(val:any) {
    var fd = new FormData();
    
    fd.append("email",val.email);
    
    fd.append("password",val.password);

    this.auth.loginck(fd).subscribe((data: any) => {

        if(data.msg=="Invalid Login!!!") {
        this.errmsg=data.msg;
        }
        else {
          localStorage.setItem("cname",data.customerdata.cust_name);
          localStorage.setItem("cid",data.customerdata.cust_id);
          window.location.href="/";
        }
      
      });
  }

  registercust(val: any) {

    var fd = new FormData();
    fd.append("name",val.name);
    fd.append("email",val.email);
    fd.append("phone",val.phone);
    fd.append("password",val.password);

    this.auth.regc(fd).subscribe((data: any) => {

        this.msg=data.msg;      
      });
    
  }


  ngOnInit(): void {
    this.selcat();




    $('.toggle').click(function () {
      // Switches the Icon
      $(this).children('i').toggleClass('fa-pencil');
      // Switches the forms  
      $('.form').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: "toggle"
      }, "slow");
    });

  }

}
