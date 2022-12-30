import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  constructor(private http:HttpClient) { }

  getcat() {
    return this.http.get("http://localhost/shop_manager/api/selcatapi.php");
  }
}
