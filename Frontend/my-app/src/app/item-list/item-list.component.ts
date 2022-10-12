import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-item-list',
  templateUrl: './item-list.component.html',
  styleUrls: ['./item-list.component.scss']
})
export class ItemListComponent implements OnInit {
  value = 'test';
  public data: any = [];
  constructor(private http: HttpClient) {
  }

  ngOnInit(): void {
  }
  putData(){
    const url ='http://localhost:8000/?ID=PUT'
    this.http.put(url, this.value).subscribe((res)=>{
      this.data = res
    })
  }
}
