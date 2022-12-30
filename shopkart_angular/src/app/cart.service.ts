import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class CartService {

  constructor(private http:HttpClient) { }

    addcart(fd:any) {
      return this.http.post("http://localhost/shop_manager/api/addtocartapi.php",fd);
    }

    listcart(fd:any) {
      return this.http.post("http://localhost/shop_manager/api/listcartapi.php",fd);
    }

    updcart(fd:any) {
      return this.http.post("http://localhost/shop_manager/api/updqtyapi.php",fd);
    }

    delcart(fd:any) {
      return this.http.post("http://localhost/shop_manager/api/delcapi.php",fd);
    }

    cforder(fd:any){
      return this.http.post("http://localhost/shop_manager/api/coapi.php",fd);
    }

    listorder(fd:any){
      return this.http.post("http://localhost/shop_manager/api/orderapi.php",fd);
    }
}
