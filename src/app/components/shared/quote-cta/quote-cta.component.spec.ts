import { ComponentFixture, TestBed } from '@angular/core/testing';

import { QuoteCtaComponent } from './quote-cta.component';

describe('QuoteCtaComponent', () => {
  let component: QuoteCtaComponent;
  let fixture: ComponentFixture<QuoteCtaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ QuoteCtaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(QuoteCtaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
