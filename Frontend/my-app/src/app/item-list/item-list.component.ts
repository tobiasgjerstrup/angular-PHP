import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-item-list',
  templateUrl: './item-list.component.html',
  styleUrls: ['./item-list.component.scss']
})
export class ItemListComponent implements OnInit {
  value = '';
  public data: any = [];
  constructor(private http: HttpClient) {
  }
  getData(){
    const url ='http://localhost:8000/?ID=JSON'
    this.http.get(url).subscribe((res)=>{
      this.data = res
      console.log(this.data)
    })
  } 
  ngOnInit(): void {
    this.getData();
  }
  putData(){
    const url ='http://localhost:8000/?ID=PUT'
    this.http.put(url, this.value).subscribe((res)=>{
      this.getData();
    })
  }
  removeData(i: any){
    const url ='http://localhost:8000/?ID=REMOVE'
    this.http.put(url, i).subscribe((res)=>{
      this.getData();
    })
  }
  createData(i: any){
    console.log(i)
    const url ='http://localhost:8000/?ID=CREATE'
    this.http.put(url, i).subscribe((res)=>{
      this.getData();
    })
  }
}
