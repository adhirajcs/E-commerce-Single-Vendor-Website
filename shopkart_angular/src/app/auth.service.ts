import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http:HttpClient) { }

  regc(fd:any) {
    return this.http.post("http://localhost/shop_manager/api/regcustapi.php",fd);

  }

  loginck(fd:any) {
    return this.http.post("http://localhost/shop_manager/api/logincapi.php",fd);

  }
}
