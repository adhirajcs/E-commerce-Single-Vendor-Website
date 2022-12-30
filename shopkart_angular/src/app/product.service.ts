import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  constructor(private http:HttpClient) { }

  getp(){
    return this.http.get("http://localhost/shop_manager/api/selproductapi.php");
  }

  getpcat(fd:any){
    return this.http.post("http://localhost/shop_manager/api/selproductbycatapi.php",fd);
  }
}
