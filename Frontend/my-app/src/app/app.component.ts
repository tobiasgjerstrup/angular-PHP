import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  title = 'my-app';
  public data: any = [];
  constructor(private http: HttpClient) {
  }
  test = this.getData();
  getData(){
    const url ='http://localhost:8000/?ID=JSON'
    this.http.get(url).subscribe((res)=>{
      this.data = res
      console.log(this.data)
    })
    this.putData();
  }
  putData(){
    const url ='http://localhost:8000/?ID=PUT'
    this.http.put(url, "this is a test").subscribe((res)=>{
      this.data = res
    })
  }
}
