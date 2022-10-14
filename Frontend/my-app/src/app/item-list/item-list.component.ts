import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-item-list',
  templateUrl: './item-list.component.html',
  styleUrls: ['./item-list.component.scss']
})
export class ItemListComponent implements OnInit {
  url = 'http://192.168.8.117/';
  value = '';
  public data: any = [];
  constructor(private http: HttpClient) {
  }
  getData(){
    this.http.get(this.url+'?ID=JSON').subscribe((res)=>{
      this.data = res;
    })
  } 
  ngOnInit(): void {
    this.getData();
  }
  putData(){
    this.http.put(this.url+'?ID=PUT', this.value).subscribe((res)=>{
      this.getData();
    })
  }
  removeData(i: any){
    this.http.put(this.url+'?ID=REMOVE', i).subscribe((res)=>{
      this.getData();
    })
  }
  createData(i: any){
    console.log(i)
    this.http.put(this.url+'?ID=CREATE', i).subscribe((res)=>{
      this.getData();
    })
  }
}
