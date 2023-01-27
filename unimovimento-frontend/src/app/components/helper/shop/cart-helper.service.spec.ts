import { TestBed } from '@angular/core/testing';

import { CartHelperService } from './cart-helper.service';

describe('CartHelperService', () => {
  let service: CartHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(CartHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
