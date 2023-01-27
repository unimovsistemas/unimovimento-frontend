import { TestBed } from '@angular/core/testing';

import { MinistryHelperService } from './ministry-helper.service';

describe('MinistryHelperService', () => {
  let service: MinistryHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MinistryHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
