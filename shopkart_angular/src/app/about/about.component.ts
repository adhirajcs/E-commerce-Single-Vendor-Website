import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css']
})
export class AboutComponent implements OnInit {


  cname:any="";
  cid:any="";

  constructor() { }

  logout() {
    localStorage.removeItem("cname");
    localStorage.removeItem("cid");
    window.location.href="/";
  }

  ngOnInit(): void {

    this.cname=localStorage.getItem("cname");
  }

}
