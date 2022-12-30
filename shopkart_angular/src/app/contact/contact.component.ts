import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements OnInit {

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
