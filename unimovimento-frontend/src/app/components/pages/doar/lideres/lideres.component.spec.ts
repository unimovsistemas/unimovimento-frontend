import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LideresComponent } from './lideres.component';

describe('VolunteersComponent', () => {
  let component: LideresComponent;
  let fixture: ComponentFixture<LideresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ LideresComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(LideresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
